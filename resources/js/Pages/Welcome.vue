<template>
    <div>
        <!-- Section 1 -->
        <nav-header :can-login="canLogin" :dashboard-url="dashboardUrl"/>

        <!-- Section 2 -->
        <hero-section :academic-levels="academicLevels" :paper-types="paperTypes" :deadlines="deadlines"/>

        <features/>
        <testimonials/>
        <call-to-action/>
        <faqs/>
        <page-footer/>
    </div>
</template>

<script>
import CallToAction from "../Components/Homepage/CallToAction.vue";
import Faqs from "../Components/Homepage/Faqs.vue";
import Features from "../Components/Homepage/Features.vue";
import NavHeader from "../Components/Homepage/NavHeader.vue";
import PageFooter from "../Components/Homepage/PageFooter.vue";
import Testimonials from "../Components/Homepage/Testimonials.vue";
import HeroSection from "../Components/Homepage/HeroSection.vue";

export default {
    components: {HeroSection, Features, Testimonials, CallToAction, Faqs, PageFooter, NavHeader},
    props: {
        canLogin: Boolean,
        canRegister: Boolean,
        dashboardUrl: String,
        academicLevels: Object,
        paperTypes: Object,
        deadlines: Object,
    }
}
</script>
