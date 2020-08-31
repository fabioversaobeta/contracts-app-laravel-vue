<template>
  <Container :class="item.type" role="alert">
    <v-icon :name="item.icon"></v-icon>

    <div>
        <strong v-if="item.title">{{ item.title }}</strong>
        <p v-if="item.description">{{ item.description }}</p>
    </div>

    <button @mouseover="removeMessage(item.id)" type="button">
        <v-icon name="close"></v-icon>
    </button>
  </Container>
</template>

<script>
import { mapActions } from 'vuex'
import { Container } from './styles'

export default {
  name: 'ToastItem',
  components: {
    Container
  },
  props: {
    item: Object
  },
  mounted () {
    if (this.item.id) {
      setTimeout(
        function () {
          this.removeMessage(this.item.id)
        }.bind(this), 4000
      )
    }
  },
  methods: {
    ...mapActions('toast', ['removeMessage'])
  }
}
</script>
