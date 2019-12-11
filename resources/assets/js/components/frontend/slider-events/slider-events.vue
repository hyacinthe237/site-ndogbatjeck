<template lang="html">
    <section>
        <div v-for="even in events">
            <div class="card text-white bg-success">
                  <div class="card-body">
                      <div class="row">
                          <div class="col-sm-4">
                              <img :src="even.image" style="width:100%;height:300px;" class="img-responsive" />
                          </div>
                          <div class="col-sm-8">
                              <h5 class="card-title bold">{{ even.title }}</h5>
                              <p class="card-text">
                                  <i class="ion-calendar"></i> {{ even.date_activity }} {{ even.time_activity }} <i class="ion-flag"></i> {{ even.location }}<br>
                                  {{ even.excerpt }}
                              </p>
                              <div class="plus">
                                  <a :href="'/activites/'+ even.slug" class="btn btn-primary bold">Plus</a>
                              </div>
                          </div>
                      </div>
                  </div>
            </div>
        </div>
    </section>
</template>

<script>
import moment from 'moment'

export default {

    props: ['events'],

    data: () => ({

    }),

    mounted () {
        this.ghost = this.events
        console.log(this.ghost);
    },

    methods: {
        
    }
}
</script>

<style lang="css">
p {text-align: justify;}
</style>
