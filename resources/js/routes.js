import AllItem from './components/item/AllItems.vue';
import CreateItem from './components/item/CreateItem.vue';
import EditItem from './components/item/EditItem.vue';

import AllCustomer from './components/customer/AllCustomers.vue';
import CreateCustomer from './components/customer/CreateCustomer.vue';
import EditCustomer from './components/customer/EditCustomer.vue';

export const routes = [
    {
        name: 'item.index',
        path: '/item',
        component: AllItem
    },
    {
        name: 'item.create',
        path: '/create/item',
        component: CreateItem
    },
    {
        name: 'item.edit',
        path: '/edit/item/:id',
        component: EditItem
    },

    {
        name: 'customer.index',
        path: '/customer',
        component: AllCustomer
    },
    {
        name: 'customer.create',
        path: '/create/customer',
        component: CreateCustomer
    },
    {
        name: 'customer.edit',
        path: '/edit/customer/:id',
        component: EditCustomer
    }
];
