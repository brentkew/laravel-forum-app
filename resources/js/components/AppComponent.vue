<template>
    <div>
        <header-component></header-component>
            <router-view></router-view>
        <footer-component></footer-component>
    </div>
</template>

<script>
import HeaderComponent from './HeaderComponent.vue';
import FooterComponent from './FooterComponent.vue';


export default {
    components: { HeaderComponent, FooterComponent },
}
</script>


<style>

</style>