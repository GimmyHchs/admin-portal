export default class Errors {
    constructor(data) {
        this.original_data = data;
        for (let field in data) {
            this[field] = data[field];
        }

        this.errors = new FormErrors();
    }

    data() {
        let data = Object.assign({}, this);
        delete data.errors;

        return data;
    }

    clear() {
        for (let field in this.original_data) {
            this[field] = null;
        }
    }

    axios(type, url) {
        return new Promise((resolve, reject) => {
            axios[type](url, this.data())
                .then(response => {
                    this.onSuccess(response);

                    resolve(response.data);
                })
                .catch(error => {
                    this.onFail(error.response.data)

                    reject(error.response.data);
                });
        });
    }

    onSuccess(response) {
        console.log('axios success');
    }

    onFail(errors) {
        this.errors.record(errors);
    }
}


class FormErrors {
    constructor() {
        this.errors = {};
    }

    get(field) {
        if(this.errors[field]){
            return this.errors[field][0];
        }
    }

    record(errors) {
        this.errors = errors;
    }

    clear(field) {
        if(field){
            delete this.errors[field];

            return;
        }

        this.errors = {};
    }

    has(field){
        if(this.errors[field]){
            return true;
        }

        return false;
    }
}
