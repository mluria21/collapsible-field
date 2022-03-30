<template>
    <div>
        <div v-if="!show" class="flex border-b border-40">
			<div class="py-4 w-1/4 text-80">{{field.title}}</div>
			<div class="py-4 w-3/4">
				<button
					type="button"
					class="cursor-pointer dim inline-block text-primary font-bold"
					@click="toggle()"
				>Show Content</button>
			</div>
		</div>
        <div v-if="show">
            <div v-for="childField in field.fields">
                <component
                    class="collapsible-field"
                    :is="'detail-' + childField.component"
                    :resource-id="resourceId"
                    :resource-name="resourceName"
                    :field="childField"
                    :ref="'field-' + childField.attribute"
                />
            </div>
        </div>
        <div v-if="show" class="flex border-b border-40">
			<div class="py-4 w-1/4 text-80"></div>
			<div class="py-4 w-3/4">
				<button
					type="button"
					class="cursor-pointer dim inline-block text-primary font-bold"
					@click="toggle()"
				>Hide Content</button>
			</div>
		</div>
    </div>
</template>

<script>
import toggle from '../mixin/toggle'
export default {
    mixins: [toggle],

    props: ['resource', 'resourceName', 'resourceId', 'field'],
}
</script>
<style>
.collapsible-field > .border-b{
	border:0;
}
</style>
