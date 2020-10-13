<template>
    <div>
        <div class="Subscribe--newsletter">
            <form name="subscribe_form">
                <div class="form-group">
                    <div class="alert alert-success" id="messages" style="display: none">
                        Thanks for subscribe with us
                    </div>
                    <div style="display: block;" id="inputs">
                        <input type="email" v-model="email" placeholder="أشترك بنشرة الاخبار">
                        <button type="button" @click="subscribing()">اشترك</button>
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
                email: ''
            }
        },
        methods:{
            subscribing(){
                axios.post('/subscribe', {
                    email: this.email
                })
                .then((response) => {
                    this.email = '';
                    setTimeout(function(){
                        document.getElementById('inputs').style.display = 'none';
                        document.getElementById('messages').style.display = 'block';
                    }, 3000);

                    setTimeout(function(){
                        document.getElementById('messages').style.display = 'none';
                        document.getElementById('inputs').style.display = 'block';
                    }, 6000)

                })
            }
        }
    }
</script>

<style scoped>

</style>