<!-- ========================================================================= Quasar / VUE =============================================================================== -->

<!-- ========================================================================= СТРУКТУРА СТРАНИЦЫ =================================================================================== -->

<template>
	<q-layout>
		<q-page>
			<!-- Верстка -->
		</q-page>
	</q-layout>
</template>


<!-- ========================================================================= КНОПКИ =================================================================================== -->

<!-- Кнопка с текстом  -->
<q-btn color="primary" class="btn-close btn-no-effects">
	<q-icon name="svguse:icons/allIcons.svg#close-modal-out" color="white" size="32px" />
	<span>Кнопка</span>
</q-btn>

<!-- Кнопка с лейблом -->
<q-btn class="q-btn-no text-h6 no-hover text-grey-10" outline flat label="Отмена" type="reset" primary/>

<!-- Кнопка без иконки  -->
<q-btn unelevated color="blue-1" class="my-btn q-mr-md text-weight-bold">
	<span class="block">Сохранить</span>
</q-btn>

<!-- Кнопка открытия модального окна  -->
<q-btn unelevated color="blue-1" class="my-btn q-mb-md text-weight-bold" no-caps @click="dialogCategoryModal = true">
	<span class="block">Новая Категория</span>
</q-btn>

<!-- ========================================================================= INPUTS ====================================================================================== -->

<q-input class="q-mr-lg q-mb-lg" type="number" filled label="Цена продажи" v-model="input" style="border-radius: 0.375rem; overflow: hidden; max-width: 312px; width: 100%;"/>

<!-- ========================================================================= ВЫПАДАЮЩИЙ СПИСОК ====================================================================================== -->

<q-expansion-item class="text-h6 text-grey-10 no-hover" expand-separator label="История операций">
	<q-card>
		<q-card-section class="bg-dark-panel text-body2">
			Текст
		</q-card-section>
	</q-card>
</q-expansion-item>

<!-- ========================================================================= SEPARATOR =================================================================================== -->

<q-separator style="background-color: #25272D;" />

<!-- ========================================================================= DIALOG =================================================================================== -->

<q-dialog
	v-model="dialogPromoModal"
	class="dialog-full"
	position="right"
>
	<PromoModal />
</q-dialog>

<!-- Окно  -->

<div class="column q-pt-lg q-pb-lg">
	<q-btn unelevated color="blue-1" class="my-btn text-weight-bold q-mb-sm" no-caps @click="dialogNewSubcategoryModal = true"> 
		<q-icon name="svguse:icons/allIcons.svg#plus" size="12px" class="q-mr-sm" />
		<span class="block">Новая подкатегория</span>
	</q-btn>
	<q-btn unelevated color="blue-1" class="my-btn q-mb-md text-weight-bold" no-caps @click="dialogNewCategoryModal = true">
			<span class="block">Новая Категория</span>
	</q-btn>
</div>

<!-- Окно Категории  -->
<q-dialog v-model="dialogCategoryModal"> 
	<q-card class="column justify-between q-card-activ bg-blue-grey-9 q-pt-xs q-pb-md" style="max-width: 832px; width: 100%; min-height: 440px;">
		<!-- Header  -->
		<q-card-section class="row items-center q-pl-xl">
			Content
		</q-card-section>
			<!-- Body  -->
			<q-card-section class="row items-center q-pt-xl q-pr-xl q-pl-xl">
				Content
			</q-card-section>
			<!-- Footer  -->
			<q-card-section class="row justify-between items-center">
				Content
			</q-card-section>
	</q-card>
</q-dialog>

<!-- ======================================================== ПОДКЛЮЧЕНИЕ КОМПОНЕНТОВ =================================================================================== -->
<template>

	<MyComponent />
	<my-component></my-component>

</template>

<script>
import { ref } from 'vue';
import MyComponent from 'src/components/MyComponent.vue';

export default {
  components: {
	MyComponent,
  },
};
	
</script>
<!-- //======================================================================================================================================================== -->
