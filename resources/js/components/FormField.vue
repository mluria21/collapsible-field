<template>
	<div>
		<div v-if="!show" class="flex border-b border-40">
			<div class="py-6 px-8 w-1/5 text-80">{{field.title}}</div>
			<div class="py-6 px-8 w-1/2">
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
					:is="'form-' + childField.component"
					:errors="errors"
					:resource-id="resourceId"
					:resource-name="resourceName"
					:field="childField"
					:ref="'field-' + childField.attribute"
					:show-help-text="childField.helpText != null"
				/>
			</div>
		</div>
		<div v-if="show" class="flex border-b border-40 pb-6">
			<div class="px-8 w-1/5 text-80"></div>
			<div class="px-8 w-1/2">
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
import { FormField, HandlesValidationErrors } from 'laravel-nova'
import toggle from '../mixin/toggle'
export default {
	mixins: [FormField, HandlesValidationErrors,toggle],

	props: ['resourceName', 'resourceId', 'field'],

	methods: {
		
		setInitialValue() {
			this.value = this.field.value || ''
		},

		fill(formData) {
			//if (this.dependenciesSatisfied) {
				_.each(this.field.fields, field => {
					if (field.fill) {
						field.fill(formData)
					}
				})
			//}
		}
	},
}
</script>
<style>
.collapsible-field > .border-b{
	border:0;
}
</style>
