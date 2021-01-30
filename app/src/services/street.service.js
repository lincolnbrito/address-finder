import ApiService from './api.service'

class StreetService extends ApiService {
    constructor() {
        super({path:'street'});
    }

    search(params) {
        return this.client.get('', { params }  );
    }
}

export default new StreetService()
