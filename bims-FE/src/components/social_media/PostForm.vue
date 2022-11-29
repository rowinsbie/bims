<template>
<div>
    <textarea  rows="3" class="form-control sulatan" placeholder="Ano ang iyong gustong sabihin?"></textarea>
    <hr />
    <ul class="actions">
        <li>
            <font-awesome-icon class="action-buttons" icon="fa-solid fa-user" />
        </li>
        <li>
            <font-awesome-icon class="action-buttons" icon="fa-solid fa-file-image" />                            </li>
        <li>
            <button class="btn btn-primary"> <font-awesome-icon icon="fa-solid fa-paper-plane" /> Ibahagi</button>
        </li>
    </ul>
</div>
</template>
<script lang="ts">
import  { defineComponent } from 'vue';

export default defineComponent({

});
</script>
<style lang="scss">
.sulatan {
    border-width: 0px IM !important;
    font-size: 30px;   

}

.actions {
    display: flex;
    gap: 16px;
    justify-content: end;
    align-items: flex-end;
    .action-buttons {
        font-size: 2rem;
        color: rgb(88, 164, 235);
    }
    li:last-child {
        button {
            border-radius: 10px 10px 10px 10px;
        }
    }
   
}
</style>