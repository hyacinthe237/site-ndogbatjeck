<template lang="html">
    <div class="modal fade" id="DescriptionModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <h5 class="bold">{{ element.title }}</h5>

                    <div class="mt-10 desc" v-html="element.desc"></div>

                    <div class="text-right mt-20">
                        <button class="btn btn-teal" data-dismiss="modal">
                            Fermer
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: {
        element: {
            type: Object,
            default: () => {}
        }
    }
}
</script>

<style lang="css" scoped>
.modal { padding-top: 20%; }
.modal-content { background-color: white }
.modal-body { padding: 20px; }
.desc { text-align: justify; }
h5 { margin: 0; text-transform: uppercase;}
</style>
