@include('admin.includes.alerts')

@csrf
<div class="form-group">
    <label for="name">Nome:</label>
    <input type="text" class="form-control" name="name" value="{{ $plan->name ?? old('name') }}">
</div>

<div class="form-group">
    <label for="description">Descrição: </label>
    <input type="text" class="form-control" name="description" value="{{ $plan->description ?? old('description') }}">
</div>

<div class="form-group">
    <label for="price">Preço</label>
    <input type="text" class="form-control" name="price" value="{{ $plan->price ?? old('price') }}">
</div>
<div class="form-group">
    <button type="submit" class="btn btn-dark">Enviar</button>
</div>