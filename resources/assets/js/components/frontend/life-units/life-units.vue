<template lang="html">
    <div class="col-sm-4">
        <a :href="'life-units'+theme.slug">
            <img :src="theme.image" :alt="theme.slug" class="img-responsive" style="display:block;margin:auto;margin-bottom:20px;">
        </a>
    </div>
</template>

<script>
export default {
    props: ['theme'],

    beforeMount () {
        this.ghost = this.theme
    },

    methods: {
        strip(html){
            if (html == null) {
                return '';
            } else {
                var doc = new DOMParser().parseFromString(html, 'text/html');
                return doc.body.textContent;
            }
       }
    }
}
</script>
