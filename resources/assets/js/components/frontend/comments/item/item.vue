<template lang="html">
    <div class="comment-container">
        <div class="_badge">
             <img src="/assets/img/default-user.png" />
        </div>

        <div class="comment-content">
            <div class="ago">{{ created_at }}</div>
            <div class="text">{{ comment.body }}</div>
        </div>
    </div>
</template>

<script>
import moment from 'moment'

export default {
    props: ['comment'],

    computed: {
        created_at () {
            return moment(this.comment.created_at).locale('fr').format('ddd DD MMM YYYY HH:ss')
        },
    }
}
</script>
