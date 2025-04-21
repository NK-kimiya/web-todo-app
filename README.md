# Laravel MVC開発の学習メモ

このREADMEは、Laravelを使ったMVCアプリ開発の基本的な流れを学んだ内容をまとめたものです。

## ✅ 開発の流れ

### 1. 🧱 マイグレーションファイルでDB設計
`php artisan make:model TodoItem -m`

- モデルファイル：`app/Models/TodoItem.php`
- マイグレーションファイル：`database/migrations/..._create_todo_items_table.php`

👉 データベースにどんな項目を保存するか（設計）を定義します。

---

### 2. 🎨 レイアウトテンプレートの作成（共通UIとTodo用）

`resources/views/layouts/`

- `app.blade.php`：HTMLの共通レイアウト（ヘッダー、フッター、@yield）
- `errors.blade.php`：エラー表示用部分テンプレート

👉 すべてのページで共通となるデザイン・構造を定義します。

`resources/views/todo/`　
- `create.blade.php`：データ作成
- `edit.blade.php`：編集
- `edit.blade.php`：Todoのトップ(未完了と完了を切り分けて表示)


---

### 3. 🎮 コントローラ作成（C：コントローラ）

`php artisan make:controller TodoController`

- `app/Http/Controllers/TodoController.php`

👉 ユーザーの操作に応じた処理（表示・保存・更新・削除）を定義します。

---

### 4. 🔗 ルーティング設定（web.php）

`routes/web.php`

```php
Route::resource('todo', App\Http\Controllers\TodoController::class);
Route::put('todo/done/{todo}', [TodoController::class, 'done'])->name('todo.done');
Route::put('todo/undone/{todo}', [TodoController::class, 'undone'])->name('todo.undone');
