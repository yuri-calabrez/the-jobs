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
    </div>
</template>

<script>
    import EducationComponent from './EducationComponent.vue';
    export default {
        components: {
            'education-component': EducationComponent
        }
    }
</script>