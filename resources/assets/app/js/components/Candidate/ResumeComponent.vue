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

        <section>
            <div class="container">
                <header class="section-header">
                    <h2>Skills</h2>
                </header>

                <skill-component></skill-component>
            </div>
        </section>
    </div>
</template>

<script>
    import EducationComponent from './EducationComponent';
    import WorkExperienceComponent from './WorkExperienceComponent';
    import SkillComponent from './SkillComponent';
    export default {
        components: {
            'education-component': EducationComponent,
            'work-experience-component': WorkExperienceComponent,
            'skill-component': SkillComponent
        }
    }
</script>