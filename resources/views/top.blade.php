@extends('layout')

@section('contents')
<div id="app" class="container py-5">
    <div class="row">
        <div class="col-3"></div>
        <div class="col-6">
            <h1 class="mb-4">ToDo アプリ By HTMX</h1>

            <div class="mb-2 d-flex justify-content-end">
                <!-- 並び替えオプション -->
                <button id="sortByDueDate" class="btn btn-outline-secondary mr-2">期日で並び替え</button>
                <button id="sortByStatus" class="btn btn-outline-secondary">ステータスで並び替え</button>
            </div>

            <!-- ToDo項目テーブル -->
            <button hx-get="{{ route('api.index')}}">click</button>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">ステータス</th>
                        <th scope="col">タイトル</th>
                        <th scope="col">期日</th>
                        <th scope="col">操作</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- 項目例 -->
                    <tr>
                        <td>未完了</td>
                        <td>サンプルタスク</td>
                        <td>2023-01-01</td>
                        <td>
                            <button class="btn btn-secondary btn-sm mr-2">編集</button>
                            <button class="btn btn-danger btn-sm">削除</button>
                        </td>
                    </tr>
                    <!-- 他のToDo項目 -->
                    <template id="todo-list">
                        {{-- {{#data}}
                        <td>{{status}}</td>
                        <td>{{title}}</td>
                        <td>{{deadline}}</td> --}}
                        <td>
                            <button class="btn btn-secondary btn-sm mr-2">編集</button>
                            <button class="btn btn-danger btn-sm">削除</button>
                        </td>

                    </template>
                </tbody>
            </table>

            <!-- 新規追加ボタン -->
            <div class="d-flex justify-content-end">
                <button type="button" class="btn btn-primary" hx-get="{{ route('api.create')}}">新規追加</button>
            </div>
        <div class="col-3"></div>
    </div>
</div>

<!-- Bootstrap JSと依存ファイルの読み込み -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
@endsection
