import {FormManager} from "../../../Core/js/form";
import {Ajax} from "../../../Core/js/ajax";
import {pageManager} from "../../../Core/js/pageManager";
import {DatasourceAjax} from "../../../Core/js/datasourceAjax";
import {t} from "../../i18n.xml";
import {t as TCommonBase} from "../../../CommonBase/i18n.xml";
import {ObjectsList} from "../../../Core/js/ObjectsList/objectsList";
import {Permissions} from "../../../Core/js/permissions";
import {ListRenderer} from "../../../Core/js/utils/listRenderer";
import CustomDataSchemaField from "../../Views/CustomDataSchemaField.mpts";

export class index {
    constructor(page, data) {
        const container = page.querySelector('.page-CustomDataSchema-list .container');
        let datasource = new DatasourceAjax('CustomDataSchema', 'getTable', ['CustomData', 'CustomDataSchema'], null, 'updateMultiple');
        let objectsList = new ObjectsList(datasource);
        objectsList.allowTableEdit = true;
        objectsList.columns = [];
        objectsList.columns.push({
            name: t('CustomDataSchema.name'),
            dataName: 'name',
            sortName: 'name',
            width: 100,
            widthGrow: 1
        });
        objectsList.generateActions = (rows, mode) => {
            let ret = [];
            if (rows.length == 1) {
                ret.push({
                    name: TCommonBase("show"),
                    icon: 'icon-show',
                    href: "/CustomData/index/" + rows[0].id,
                    action: "show"
                });
                if (Permissions.can('CustomDataSchema', 'edit')) {
                    ret.push({
                        name: TCommonBase("edit"),
                        icon: 'icon-edit',
                        href: "/CustomDataSchema/edit/" + rows[0].id,
                        action: "edit"
                    });
                }
            }
            return ret;
        }
        container.append(objectsList);
        objectsList.refresh();
    }
}

export class edit {
    constructor(page, data) {
        let form = new FormManager(page.querySelector('form'));
        let fields = new ListRenderer(page.querySelector('.fields'), (item, node) => {
            if (node) {
                item.name = node.querySelector('.name').value;
                item.type = node.querySelector('.type').value;
            }
            return CustomDataSchemaField(item).firstChild;
        });
        page.querySelector('.addField').onclick = e => {
            e.preventDefault();
            fields.add({name: '', type: 'text'});
        }
        form.submit = async rawNewData => {
            let newData = {id: rawNewData.id, name: rawNewData.name}
            fields.render();
            newData.fields = fields.list;
            if (newData.id)
                await Ajax.CustomDataSchema.update(newData);
            else
                await Ajax.CustomDataSchema.insert(newData);
            pageManager.goto('/CustomDataSchema');
        }

    }
}

export class add extends edit {
    constructor(page, data) {
        super(page, data);
    }
}
