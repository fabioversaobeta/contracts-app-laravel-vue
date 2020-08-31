<template>
  <div class="table">
    <table>
      <thead>
        <th v-for="(header, headerIndex) in headers" :key="headerIndex">
          <div class="th">{{ header }}</div>
        </th>
      </thead>
      <tbody>
        <tr v-for="(item, itemIndex) in items" :key="itemIndex">
          <td v-for="(value, valueIndex) in item" :key="valueIndex">
            <div v-if="value === 'delete'" class="td">
                <button type="button">
                    <v-icon name="trash-2"></v-icon>
                </button>
            </div>
            <div v-else class="td" v-html="value"></div>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</template>

<script>
export default {
  name: 'Table',
  props: {
    headers: Array,
    items: Array
  }
}
</script>

<style lang="sass">
  @import "./Table.scss"
</style>
