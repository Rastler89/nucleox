<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MoldResource\Pages;
use App\Filament\Resources\MoldResource\RelationManagers;
use App\Models\Mold;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Filters\Filter;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Storage;

class MoldResource extends Resource
{
    protected static ?string $model = Mold::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function getNavigationLabel(): string {
        return __('Molds');
    }

    public static function getModelLabel(): string {
        return __('Molds');
    }

    public static function getNavigationBadge(): ?string {
        return static::getModel()::count();
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name'),
                Textarea::make('description'),
                TextInput::make('model'),
                FileUpload::make('image')->image()->preserveFilenames()->required(),
                TextInput::make('materials'),
                TextInput::make('applications'),
                Toggle::make('activated')
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')->sortable(),
                ImageColumn::make('image')->translateLabel(),
                TextColumn::make('name')->sortable()
                    ->description(fn (Mold $record): string => $record->description)
                    ->searchable()
                    ->translateLabel(),
                TextColumn::make('model')->sortable()
                    ->searchable()
                    ->translateLabel(),
                TextColumn::make('applications')->sortable()
                    ->searchable()
                    ->translateLabel(),
                ToggleColumn::make('activated')
                    ->translateLabel()
            ])
            ->filters([
                Filter::make('activated'),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\Action::make('pdf')
                    ->label('PDF')
                    ->color('success')
                    ->icon('heroicon-m-arrow-down-tray')
                    ->action(function (Mold $mold) {
                        return response()->streamDownload(function() use ($mold) {
                            
                            //codificamos la imagen
                            $imageData = Storage::disk('public')->get($mold->image);
                            $encodedImage = base64_encode($imageData);

                            $html = Blade::render('pdf.molde', [
                                'mold' => $mold,
                                'encodedImage' => $encodedImage,
                            ]);

                            echo PDF::loadHTML($html)->stream();
                        }, 'molde'.$mold->id.'_ncx.pdf');
                    }),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListMolds::route('/'),
            'create' => Pages\CreateMold::route('/create'),
            'edit' => Pages\EditMold::route('/{record}/edit'),
        ];
    }
}
