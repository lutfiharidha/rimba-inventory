import AllItem from './components/AllItems.vue';
import CreateItem from './components/CreateItem.vue';
import EditItem from './components/EditItem.vue';

export const routes = [
    {
        name: 'home',
        path: '/',
        component: AllItem
    },
    {
        name: 'create',
        path: '/create',
        component: CreateItem
    },
    {
        name: 'edit',
        path: '/edit/:id',
        component: EditItem
    }
];
