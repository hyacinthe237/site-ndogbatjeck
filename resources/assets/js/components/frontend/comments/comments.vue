<template lang="html">
    <section class="_comments">
        <Item v-for="item in items" :key="item.id" :comment="item" />

        <CommentInput
            :commentable-id="commentableId"
            :commentable-type="commentableType"
            @added="addComment">
        </CommentInput>
    </section>
</template>

<script>

import Item from './item/item'
import CommentInput from './input/input'

export default {
    name: 'comment-box',

    components: {  CommentInput, Item },

    props: {
        commentableId: Number,
        commentableType: String
    },

    data: () => ({
        item: {},
        items: []
    }),

    computed: {
        commentTitle () {
            if (this.items.length === 0) return 'Laissez un commentaire'
            let str = this.items.length + ' commentaire'
            str += this.items.length > 1 ? 's' : ''
            return str
        }
    },

    mounted () {
        this.getComments()
    },

    methods: {
        async getComments () {
            this.startLoading()

            const response = await axios.get(`${this.commentableType}/${this.commentableId}/comments`)
            .catch(error => console.log(error))

            if (response) {
                this.items = response.data
            }

            this.stopLoading()
        },

        addComment (comment) {
            this.items.push(comment)
        },
    }

}
</script>
