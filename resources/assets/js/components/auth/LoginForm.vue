<template lang="html">
    <div class="row">
        <div class="col-lg-12">
            <form @submit.prevent="submit()" method="post">
                <div class="form-group">
                    <input class="form-control" type="email" name="email" v-model="form.email" placeholder="Email">
                </div>
                <div class="form-group">
                    <input class="form-control" type="password" name="password" v-model="form.password" placeholder="Password">
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-sm-6 col-sm-offset-3">
                            <button v-if="is_posting" type="submit" class="btn btn-info login-submit" name="submit">登入中...</button>
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
            form:new Form({
                email:null,
                password:null,
            }),
        }
    },
    methods:{
        submit(){
            this.is_posting = true;
            this.form.axios('post', '/login')
            .then(response => {
                location.replace(response.redirectTo);
            })
            .catch(errors => {
                console.log(errors);
            });
        }
    }
}
</script>
