<template lang="html">
    <div class="card panel-login">
        <div class="panel-heading">
            <div class="row">
                <div @click="switchTo('login')" :class="{'blue-darken-2': isComponent('login')}" class="col-4  bolder pointer">Login</div>
                <div @click="switchTo('register')" :class="{'blue-darken-2': isComponent('register')}" class="col-4 bolder pointer">Register</div>
                <div @click="switchTo('reset')" :class="{'blue-darken-2': isComponent('reset')}" class="col-4 bolder pointer">ResetPassword</div>
            </div>
            <hr>
        </div>
        <div class="panel-body">
            <img src="/images/logo.png" alt="AsiaYo" class="login-logo">
            <transition name="fade" mode="out-in">
                <keep-alive>
                    <component :is="now_component"></component>
                </keep-alive>
            </transition>
        </div>
    </div>
</template>

<script>
import LoginForm from './LoginForm';
import RegisterForm from './RegisterForm';
import ResetForm from './ResetPasswordForm';

export default {
    components:{
        'login':LoginForm,
        'register':RegisterForm,
        'reset':ResetForm,
    },
    data(){
        return {
            now_component:'login',
        };
    },
    methods:{
        isComponent(component){
            return this.now_component == component;
        },
        switchTo(component){
            this.now_component = component;
        },
    }
}
</script>
