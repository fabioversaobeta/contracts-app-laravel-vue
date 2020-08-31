<template>
  <Container>
    <ToastItem
      v-for="(item, index) in messages"
      :key="index"
      :item="item"
    />
  </Container>
</template>

<script>
import ToastItem from './components/ToastItem/ToastItem.vue';
import { mapGetters, mapActions } from 'vuex';
import { Container } from './styles';
import { uuid } from 'vue-uuid';

export default {
  name: 'Toast',
  components: {
    Container,
    ToastItem
  },
  data () {
    return {}
  },
  computed: {
    ...mapGetters('toast', { messages: 'getMessages' })
  },
  methods: {
    ...mapActions('toast', ['setMessages'])
  },
  watch: {
    messages: function () {
      let alter = false
      const msgs = this.messages.map(message => {
        if (message.id) {
          return message
        }

        message.id = this.$uuid.v1()
        alter = true
        return message
      })

      if (alter) {
        this.setMessages(msgs)
      }
    }
  }
}
</script>
