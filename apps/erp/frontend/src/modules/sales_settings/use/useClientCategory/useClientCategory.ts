import {ref, Ref} from "vue";
import {v4 as uuidv4} from "uuid";
import {ClientCategory} from "@/modules/sales_settings/types/ClientCategory";
import {api} from "@/modules/sales_settings/services/client_category/api";


const clientCategory: Ref<ClientCategory> = ref({
    id: uuidv4(),
    name: '',
    description: '',
    state: 'active',
    companyId: ''
});

export function useClientCategory() {

    async function create() {
        await api.createClientCategory()
    }

    function reset() {
        clientCategory.value = {
            id: uuidv4(),
            name: '',
            description: '',
            state: 'active',
            companyId: ''
        };
    }

    return {
        clientCategory,

        create,
        reset,
    }
}
