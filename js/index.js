import {pageManager} from "../../Core/js/pageManager";

pageManager.registerController('CustomDataSchema', () => import('./Controllers/CustomDataSchema'));
pageManager.registerController('CustomData', () => import('./Controllers/CustomData'));
