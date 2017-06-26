<template lang="html">
    <div class="card panel-login">
    <div class="row">
        <div class="col-12">
            <form @submit.prevent="submit()" @keydown="form.errors.clear($event.target.name)" method="post">
                <div class="form-group" :class="{ 'has-danger':form.errors.has('email') }">
                    <input class="form-control" type="email" name="email" v-model="form.email" placeholder="Email" disabled required>
                    <div v-if="form.errors.has('email')" class="form-control-feedback">{{ form.errors.get('email') }}</div>
                </div>
                <div class="form-group" :class="{ 'has-danger':form.errors.has('password') }">
                    <input class="form-control" type="password" name="password" v-model="form.password" placeholder="Password" required>
                    <div v-if="form.errors.has('password')" class="form-control-feedback">{{ form.errors.get('password') }}</div>
                </div>
                <div class="form-group" :class="{ 'has-danger':form.errors.has('password') }">
                    <input class="form-control" type="password" name="password_confirmation" v-model="form.password_confirmation" placeholder="Password Confirmed" required>
                    <div v-if="form.errors.has('password')" class="form-control-feedback">{{ form.errors.get('password') }}</div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-6 offset-md-3">
                            <button v-if="is_posting" class="btn btn-info login-submit" type="submit" name="submit">Submit...</button>
                            <button v-else class="btn btn-primary login-submit" type="submit" name="submit">Reset Password</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    </div>
</template>

<script>
export default {
    props:{
        email:String,
    },
    data(){
        return {
            is_posting:false,
            is_failed:false,
            form:new Form({
                email:null,
                password:null,
                password_confirmation:null,
            }),
        }
    },
    methods:{
        submit(){
            if(this.is_posting) return;

            this.is_posting = true;
            this.is_failed = false;
            this.form.axios('post', '/reset')
            .then(response => {
                location.replace(response.redirectTo);
            })
            .catch(errors => {
                this.is_posting = false;
                this.is_failed = true;
                console.log(errors);
            });
        }
    },
    created(){
        this.form.email = this.email;
    }
}
</script>
