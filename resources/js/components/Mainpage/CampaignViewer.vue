<template>
    <div class="campaignviewer">
        <div class="viewer">
            <div class="nav-button-field">
                <div class="navigate-buttons no-select" v-for="(cat) in categories" :key="cat.id"  @click="getProductsByCategory(cat.id)">{{ cat.category_name }}</div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data: function() {
        return {
            categories: Object,
            products: Object,
        }
    },
    mounted() {
        const options = {
            method: "POST",
            headers: {"App-Key" : process.env.MIX_API_KEY,},
            url: `${process.env.MIX_API_URL}/get-all-categories`,
        };
        axios(options).then((response) => {
            this.categories = response.data.data;
        });
    },
    methods: {
        getProductsByCategory(id) {
            const options = {
                method: "POST",
                headers: {"App-Key" : process.env.MIX_API_KEY,},
                url: `${process.env.MIX_API_URL}/get-products-by-categories`,
                data: {"category_id": id}
            };
            axios(options).then((response) => {
                this.products = response.data.data;
            });
        }
    }
}
</script>

<style lang="scss">
    .campaignviewer {
        display: flex;
        justify-content: center;
        align-items: center;

        .viewer {
            max-width: 60%;
            height: 400px;
            border: 1px dotted black;
            margin: 20px 40px 20px 40px;

            .nav-button-field {
                display: flex;
                justify-content: center;
                align-items: center;
                .navigate-buttons {
                    width: 150px;
                    height: 50px;
                    border: 1px dotted black;
                    justify-content: center;
                    align-items: center;
                    display: flex;
                    margin: 10px 35px 10px 35px;
                    cursor: pointer;
                    text-align: center;
                }
            }
        }
    }

    .no-select {
        -webkit-touch-callout: none;
        -webkit-user-select: none;
        -khtml-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
    }
</style>
