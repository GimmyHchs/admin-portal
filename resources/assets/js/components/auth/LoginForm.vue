<template lang="html">
    <div class="row">
        <div v-if="is_failed" class="col-12">
            <div class="alert alert-danger" role="alert">
                <strong>Error !</strong> 登入失敗.
            </div>
        </div>
        <div class="col-12">
            <form @submit.prevent="submit()" method="post">
                <div class="form-group">
                    <input class="form-control" type="email" name="email" v-model="form.email" placeholder="Email" required>
                </div>
                <div class="form-group">
                    <input class="form-control" type="password" name="password" v-model="form.password" placeholder="Password" required>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-6 offset-md-3">
                            <button v-if="is_posting" type="submit" class="btn btn-info login-submit" name="submit">Submit...</button>
                            <button v-else class="btn btn-primary login-submit" type="submit" name="submit">Login</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</template>

<script>
export default {
    data(){
        return {
            is_posting:false,
            is_failed:false,
            form:new Form({
                email:null,
                password:null,
            }),
        }
    },
    methods:{
        submit(){
            if(this.is_posting) return;

            this.is_posting = true;
            this.is_failed = false;
            this.form.axios('post', '/login')
            .then(response => {
                location.replace(response.redirectTo);
            })
            .catch(errors => {
                this.is_failed = true;
                this.is_posting = false;
                console.log(errors);
            });
        }
    }
}
</script>
