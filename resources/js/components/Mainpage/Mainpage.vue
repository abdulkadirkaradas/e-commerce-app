<template>
    <div class="content-app">
        <CampaignViewer />
    </div>
</template>

<script>
import CampaignViewer from './CampaignViewer.vue';
import Campaigns from './Campaigns.vue';
import Products from './Products.vue';

export default {
    props: {

    },
    components: {
        CampaignViewer, Campaigns, Products
    }
}

</script>

<style lang="scss">
    .content-app {
        display: flex;
    }
</style>
