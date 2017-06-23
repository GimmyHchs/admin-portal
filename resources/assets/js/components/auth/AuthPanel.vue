<template lang="html">
    <div class="panel panel-login">
        <div class="panel-heading">
            <div class="row">
                <div @click="switchTo('login')" :class="{'blue-darken-2': isComponent('login')}" class="col-xs-6  bolder pointer">Login</div>
                <div @click="switchTo('register')" :class="{'blue-darken-2': isComponent('register')}" class="col-xs-6 bolder pointer">Register</div>
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

export default {
    components:{
        'login':LoginForm,
        'register':RegisterForm,
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
