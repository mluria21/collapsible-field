<template>
    <div>
        <div class="flex" :class="{'border-b border-40':!show}">
			<div class="py-4 w-1/4 text-80">{{field.title}}</div>
			<div class="py-4 break-words w-3/4">
				<button
					type="button"
					class="btn btn-default btn-primary inline-flex items-center relative"
					@click="toggle()"
				>{{btnText}}</button>
			</div>
		</div>
        <div v-if="show">
            <div v-for="childField in field.fields">
                <component
                    :is="'detail-' + childField.component"
                    :resource-id="resourceId"
                    :resource-name="resourceName"
                    :field="childField"
                    :ref="'field-' + childField.attribute"
                />
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
