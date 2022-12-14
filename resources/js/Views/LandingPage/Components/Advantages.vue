<template>
    <section class="md:mt-24 md:mb-24 md:px-12" id="advantages">
        <h2 class="mx-4">{{  $t("advantages.heading") }}</h2>
        <div  class="grid md:grid-cols-2 lg:grid-cols-3 md:gap-4 mb-8">
            <div v-for="advantage in advantages" :key="advantage.id">
                <AdvantageItem :advantage="advantage" />
            </div>
        </div>
        <div class="flex justify-center">
            <router-link :to="{ name: 'reservation' }">
                <button class="border-arth-dark-blue font-tinos hover:bg-arth-dark-blue hover:text-white">
                    {{ $t("buttons.reservation") }}
                </button>
            </router-link>
        </div>
    </section>
</template>

<script>
import AdvantageItem from "./AdvantageItem";
export default {
    components: {
        AdvantageItem
    },
    data() {
        return {
            advantages: []
        }
    },
    async mounted() {
        const response = await axios.get('api/home/advantages');
        this.advantages.push(...response.data['data']) ;
    }
}
</script>
