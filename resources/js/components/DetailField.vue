<template>
    <PanelItem :index="index" :field="field">
        <template #value>
            <input
                :id="field.attribute"
                type="checkbox"
                class="form-toggle"
                :class="errorClasses"
                @click.stop
                @change="toggle"
                v-model="value"
            />
        </template>
    </PanelItem>
</template>

<script>
export default {
    props: ['index', 'resource', 'resourceName', 'resourceId', 'field'],

    data: () => ({
        value: false,
    }),

    mounted() {
        this.value = this.field.value || false
    },

    methods: {
        toggle() {
            Nova.request().post('/nova-vendor/nova-toggle/toggle/' + this.resourceName, {
                value: this.value,
                fieldName: this.field.attribute,
                pivot: this.field.pivot ?? false,
                resourceId: this.resourceId,
                viaResourceId: this.field.viaResourceId,
                viaResource: this.field.viaResource
            }).then((res) => {
                if(!res.data.success) {
                    Nova.error('Error Updating: ' + this.field.indexName);
                }
            })
        },
    }
}
</script>
