import axios from 'axios'

export default class ApiService {

    constructor({path = null}) {
        this.path = path;

        this.client = axios.create({
            baseURL: path ? `${process.env.VUE_APP_API_URL}/${path}` : process.env.VUE_APP_API_URL,
            withCredentials: false,
            headers:{
                'Accept' :  'application/json',
                'Content-Type': 'application/json'
            }
        });
    }

    async get(url, params) {
        return this.client.get(url, params)
    }

    async post(url, params) {
        return this.client.post(url, params)
    }

    async patch(url, params) {
        return this.client.patch(url, params)
    }

    async delete(url) {
        return this.client.delete(url);
    }
}
