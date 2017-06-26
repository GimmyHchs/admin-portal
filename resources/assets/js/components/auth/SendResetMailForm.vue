<template lang="html">
    <div class="row">
        <div v-if="is_failed" class="col-12">
            <div class="alert alert-danger" role="alert">
                <strong>Error !</strong> 重設失敗.
            </div>
        </div>
        <div v-if="is_send" class="col-12">
            <div class="alert alert-success" role="alert">
                <strong>Success !</strong> {{message}}
            </div>
        </div>
        <div class="col-12">
            <form @submit.prevent="submit()" method="post">
                <div class="form-group">
                    <input class="form-control" type="email" name="email" v-model="form.email" placeholder="Email" required>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-6 offset-md-3">
                            <button v-if="is_posting" type="submit" class="btn btn-info login-submit" name="submit">Submit...</button>
                            <button v-else class="btn btn-primary login-submit" type="submit" name="submit">Reset Password</button>
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
            is_send:false,
            message:null,
            form:new Form({
                email:null,
            }),
        }
    },
    methods:{
        submit(){
            if(this.is_posting) return;

            this.is_posting = true;
            this.is_failed = false;
            this.form.axios('post', '/send-reset-mail')
            .then(response => {
                this.is_send = true;
                this.message = response.message;
                this.is_posting = false;
            })
            .catch(errors => {
                this.is_failed = true;
                this.is_posting = false;
            });
        }
    }
}
</script>
