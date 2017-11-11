<template>
    <div>
        <!-- Education -->
        <section class=" bg-alt">
            <div class="container">

                <header class="section-header">
                    <h2>Formação acadêmica</h2>
                </header>

                <education-component></education-component>
            </div>
        </section>

        <section>
            <div class="container">
                <header class="section-header">
                    <h2>Experiencias Profissionais</h2>
                </header>

                <work-experience-component></work-experience-component>
            </div>
        </section>
    </div>
</template>

<script>
    import EducationComponent from './EducationComponent.vue';
    import WorkExperienceComponent from './WorkExperienceComponent.vue';
    export default {
        components: {
            'education-component': EducationComponent,
            'work-experience-component': WorkExperienceComponent
        }
    }
</script>