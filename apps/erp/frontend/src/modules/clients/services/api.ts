import {Client} from "@/modules/clients/types/Client";
import axios from "axios";
// import {useFilters} from "@/modules/shared/use/useFilters";
import {useFilters} from "@/modules/clients/use/useFilters";
import {useClient} from "@/modules/clients/use/useClient";
import {useAuth} from "@/modules/auth/use/useAuth";
import {Catalog} from "@/modules/clients/types/Catalog";

export const api = {
    async getClients(): Promise<Client[]> {
        const {filters, orderBy, order, limit, offset} = useFilters();
        const response = await axios.get(process.env.VUE_APP_ERP_URL + '/api/client', {
            params: {
                filters: filters.value,
                orderBy: orderBy.value,
                order: order.value,
                limit: limit.value,
                offset: offset.value
            }
        });
        return new Promise(resolve => {
            resolve(response.data);
        });
    },


    async createClient(): Promise<Client> {
        const {client} = useClient();
        const response = await axios.post(process.env.VUE_APP_ERP_URL + '/api/client', {
            id: client.value.id,
            companyId: client.value.companyId,
            name: client.value.name,
            lastname: client.value.lastname,
            dni: client.value.dni,
            dniType: client.value.dniType,
            clientType: client.value.clientType,
            clientCategory: client.value.clientCategory,
            frequentClientNumber: client.value.frequentClientNumber,
            state: client.value.state,
            phones: client.value.phones,
            emails: client.value.emails,
        });
        return new Promise(resolve => {
            resolve(response.data);
        });
    },


    async updateClient(): Promise<Client> {
        const {client} = useClient();

        const response = await axios.put(process.env.VUE_APP_ERP_URL + '/api/client/' + client.value.id, {
            companyId: client.value.companyId,
            name: client.value.name,
            lastname: client.value.lastname,
            dni: client.value.dni,
            dniType: client.value.dniType,
            clientType: client.value.clientType,
            clientCategory: client.value.clientCategory,
            frequentClientNumber: client.value.frequentClientNumber,
            state: client.value.state,
            phones: client.value.phones,
            emails: client.value.emails,
            logo: 'https://www.google.com/url?sa=i&url=https%3A%2F%2Fvuejs.org%2F&psig=AOvVaw2iwaicA5-fgsHJgOFWwde7&ust=1613311099724000&source=images&cd=vfe&ved=0CAIQjRxqFwoTCPik6qyC5-4CFQAAAAAdAAAAABAD'
        });

        return new Promise(resolve => {
            resolve(response.data);
        });
    },

    async findClient(id: string): Promise<Client> {
        const response = await axios.get(process.env.VUE_APP_ERP_URL + '/api/client/' + id);
        return new Promise(resolve => {
            resolve(response.data);
        });
    },

    async updateClientState(id: string, state: string): Promise<Client> {
        const response = await axios.put(process.env.VUE_APP_ERP_URL + '/api/client/state/' + id, {
            id,
            state
        });
        return new Promise(resolve => {
            resolve(response.data);
        });
    },

    async getClientOptions(id: string): Promise<string> {
        const {token} = useAuth();
        axios.defaults.headers.common['Authorization'] = 'Bearer ' + token.value;
        const response = await axios.get(process.env.VUE_APP_ERP_URL + '/api/client/options/' + id);
        return new Promise(resolve => {
            resolve(response.data);
        });
    },

    async getClientStates(id: string): Promise<string> {
        const {token} = useAuth();
        axios.defaults.headers.common['Authorization'] = 'Bearer ' + token.value;
        const response = await axios.get(process.env.VUE_APP_ERP_URL + '/api/client/states/' + id);
        return new Promise(resolve => {
            resolve(response.data);
        });
    },

    async getCatalog(): Promise<Catalog> {
        const {currentCompanyId} = useAuth();
        const response = await axios.get(process.env.VUE_APP_ERP_URL + '/api/client/catalogs/' + currentCompanyId());
        return new Promise(resolve => {
            resolve(response.data);
        });
    }
}
