<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Timeline</div>

                    <div class="card-body">
                       <div class="media my-1" v-for="tweet in tweets" :key="tweet.id"> 
                           <div class="media-left">
                               <img src="https://www.gravatar.com/avatar/205e460b479edhd5b48aec07710c08d50" alt="">
                           </div>

                           <div class="media-body mx-1">
                               <strong>{{ tweet.user.name }}</strong>
                               <p>{{ tweet.body }}</p>
                           </div>
                       </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        mounted() {
            axios.get('/tweets').then((response) => {

                this.tweets = response.data

            })

            
        },
        data() {
            return {
                tweets: []
            }
        },
    }
</script>
