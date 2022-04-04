@include('admin.includes.alerts')
@csrf
<div class="form-group">
    <input type="text" class="form-control" name="name" placeholder="nome:" value="{{old('name')}}">
</div>
<div class="form-group">
    <input type="text" class="form-control" name="price" placeholder="preço:" value="{{old('price')}}">
</div>
<div class="form-group">
    <input type="text" class="form-control" name="description" placeholder="descrição:" value="{{old('description')}}">
</div>
<div class="form-group">
    <input type="file" class="form-control" name="image">
</div>
<div class="form-grou">
    <button type="submit" class="btn btn-success">enviar</button>
</div>