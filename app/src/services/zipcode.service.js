import ApiService from './api.service'

class ZipcodeService extends ApiService {
    constructor() {
        super({path:'zipcode'});
    }

    search(zipcode) {
        return this.client.get(zipcode);
    }
}

export default new ZipcodeService()
