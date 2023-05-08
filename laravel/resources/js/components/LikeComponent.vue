<template>
    <div class="container">
        <div id="success" class="mb-3"></div>
        <a style="cursor: pointer" @click.prevent="likeBlog">
            <i class="fa fa-thumbs-o-up" aria-hidden="true"></i>
            ({{ alllikes }})
        </a>
    </div>
</template>
<script>
import axios from "axios";

export default {
    props: ['blog'],
    data() {
        return {
            alllikes: '',
        }
    },
    methods: {
        likeBlog() {
            axios.post('/like', { post_id: this.blog.id })
            .then(res => {
                $('#success').html(res.data.message);
                this.alllikes = res.data.like;
            })
            .catch(error => {
                console.log(error.message);
            });
        },
        renderLike() {
            axios.post('/like', { post_id: this.blog.id })
                .then(res => {
                console.log(res); // res 객체를 콘솔에 출력
                if (res && res.data && res.data.like) {
                    console.log(res.data.like);
                    this.alllikes = res.data.like;
                } else {
                    throw new Error('Invalid response data');
                }
                })
                .catch(error => {
                if (error.response) {
                    console.log(error.response.data);
                } else {
                    console.log(error.message);
                }
                }); 
        }

        },
        mounted() {
        this.renderLike();
        }

};
</script>
