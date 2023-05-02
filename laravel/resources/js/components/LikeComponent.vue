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
        axios.post('/like', {
        post_id: this.blog.id // post_id 변수 추가
        })
        .then(res => {
        this.renderLike();
        $('#success').html(res.data.message);
        })
        .catch(error => {
        console.log(error.response.data);
        });
        },
        renderLike() {
        axios.post('/like', {
        post_id: this.blog.id // post_id 변수 추가
        })
        .then(res => {
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
        this.renderLike()
    }
};
</script>
