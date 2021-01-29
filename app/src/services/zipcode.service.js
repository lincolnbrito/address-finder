import ApiService from './api.service'

class ZipcodeService extends ApiService {
    constructor() {
        super({path:'zipcode'});
    }

    search(zipcode) {
        return this.client.get(zipcode);
    }

    store(data) {
        return this.client.post('', data);
    }
}

export default new ZipcodeService()
