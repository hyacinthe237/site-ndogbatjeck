<template lang="html">
    <div class="comment-input">
        <form class="_form" @submit.prevent>
            <div class="">
                <textarea name="body" rows="2"
                    v-model="ghost.body"
                    class="form-control"
                    placeholder="Commentez cet article"
                    v-validate="'required|min:3'"
                    required
                ></textarea>

                <div class="mt-20 text-right">
                    <izy-btn :bg="'success'" @clicked="save()">
                        <i class="ion-android-send"></i> Commenter
                    </izy-btn>
                </div>
            </div>
        </form>
    </div>
</template>

<script>
export default {
    props: ['commentableId', 'commentableType'],

    mounted () {
        this.resetGhost()
        this.autoresizeTexarea()
    },

    methods: {
        resetGhost () {
            this.ghost = {
                body: '',
                commentable_id: this.commentableId,
                commentable_type: this.commentableType
            }
        },

        async save () {
            if (this.ghost.comment != '') {
                this.startLoading()

                const url = this.commentableType + '/' + this.commentableId + '/comments'
                const response = await axios.post(url, this.ghost)
                .catch(error => {
                    console.log(error);
                    this.$swal.error(error.response.data.message)
                })

                if (response) {
                    this.resetGhost()
                    this.$emit('added', response.data)
                }

                this.stopLoading()
            }
        },

        /**
         * Auto resize textarea with comment
         */
        autoresizeTexarea () {

            $("textarea").keyup(function(e) {
                while($(this).outerHeight() < this.scrollHeight + parseFloat($(this).css("borderTopWidth")) + parseFloat($(this).css("borderBottomWidth"))) {
                    $(this).height($(this).height()+1);
                };
            });
        }
    }
}
</script>
