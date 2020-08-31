<template>
    <div class="table">
        <table>
            <thead>
                <th v-for="(header, headerIndex) in headers" :key="headerIndex">
                    <div class="th" @click="ordenar(header.toLowerCase())">
                        {{ header }}
                    </div>
                </th>
            </thead>
            <tbody>
                <tr v-for="(item, itemIndex) in itemsOrdered" :key="itemIndex">
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
    name: "Table",
    props: {
        headers: Array,
        items: Array
    },
    data() {
        return {
            itemsOrdered: [],
            strOrdem: ""
        };
    },
    mounted: function() {
        this.itemsOrdered = this.items;
    },
    methods: {
        ordenar: function(field) {
            console.log('ordenar', field);
            if (field == this.strOrdem) this.items.reverse();
            else {
                this.itemsOrdered.sort((e1, e2) => {
                    return this.battleOfOrder(e1[field], e2[field]);
                });
                this.itemsOrdered.reverse();
            }
            this.strOrdem = field;
            console.log('fim ordenar', this.strOrdem);
            console.log('fim ordenar  this.items',  this.items);
        },
        battleOfOrder: function(str1, str2) {
            const split1 = str1.toLowerCase().split(" ");
            const split2 = str2.toLowerCase().split(" ");

            const score = { a: 0, b: 0 };

            split1.map((string1, index) => {
                const string2 = split2[index];

                if (score.a > 0 || score.b > 0) {
                    return;
                }

                if (!split2[index]) {
                    score.b++;
                    return;
                }

                const n1 = Number(string1);
                const n2 = Number(string2);

                if (!isNaN(n1) && !isNaN(n2)) {
                    score.a = n1 > n2 ? score.a + 1 : score.a;
                    score.b = n1 < n2 ? score.b + 1 : score.b;
                    return;
                }

                if (!isNaN(n1)) {
                    score.b++;
                    return;
                }

                if (!isNaN(n2)) {
                    score.a++;
                    return;
                }

                score.a = string1 > string2 ? score.a + 1 : score.a;
                score.b = string1 < string2 ? score.b + 1 : score.b;
            });

            return score.a > score.b ? -1 : score.a < score.b ? 1 : 0;
        }
    }
};
</script>

<style lang="sass">
@import "./Table.scss"
</style>
