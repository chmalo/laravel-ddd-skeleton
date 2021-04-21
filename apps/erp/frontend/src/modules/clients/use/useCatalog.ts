import {ref, Ref} from 'vue'
import {Catalog} from "@/modules/clients/types/Catalog"
import {api} from "@/modules/clients/services/api";

const catalogs: Ref<Catalog | null> = ref(null);

export function useCatalog() {
    async function getCatalog() {
        catalogs.value = await api.getCatalog()
    }

    return {
        catalogs,
        getCatalog
    }
}

