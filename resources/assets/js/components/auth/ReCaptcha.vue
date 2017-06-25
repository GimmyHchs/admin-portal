<template>
    <div>
        <div @click="submitData">
            <slot>SUBMIT</slot>
        </div>
    </div>
</template>

<script>

// global window document
window.recaptchaLoaded = new Promise((resolve) => {
    window.vueRecaptchaInit = resolve;
});
const recaptchaScript = document.createElement('script');
recaptchaScript.setAttribute('src', 'https://www.google.com/recaptcha/api.js?onload=vueRecaptchaInit&render=explicit');
recaptchaScript.setAttribute('async', '');
recaptchaScript.setAttribute('defer', '');
document.body.appendChild(recaptchaScript);

export default {
    props: {
        dataCallback: Function,
        dataValidate: Function,
        dataBadge: String,
        dataType: String,
        dataErrorcallback: Function,
        dataTabindex: String,
        dataSize: String,
    },
    data() {
        return {
            recaptchaId: 0,
        };
    },
    created() {
        window.recaptchaLoaded.then(() => {
            try {
                const options = {
                  sitekey: RecaptchaSiteKey,
                };
                if (typeof this.dataBadge !== 'undefined') options.badge = this.dataBadge;
                if (typeof this.dataType !== 'undefined') options.type = this.dataType;
                if (typeof this.dataTabindex !== 'undefined') options.tabindex = this.dataTabidex;
                if (typeof this.dataSize === 'undefined') {
                    options.size = 'invisible';
                    options.callback = this.getToken;
                }

                const recaptchaDiv = document.createElement('div');
                recaptchaDiv.className = "outside-badge";
                this.$el.prepend(recaptchaDiv);
                this.recaptchaId = window.grecaptcha.render(recaptchaDiv, options);
            } catch (e) {
                window.console.error(e);
            }
        });
    },
    methods: {
        submitData(event) {
            event.preventDefault();
            if (typeof this.dataSize === 'undefined') {
                window.grecaptcha.execute(this.recaptchaId);
            } else {
                this.getToken(window.grecaptcha.getResponse(this.recaptchaId));
            }
        },
        getToken(token) {
            window.grecaptcha.reset(this.recaptchaId);
            this.dataCallback(token);
        },
    },
};
</script>
