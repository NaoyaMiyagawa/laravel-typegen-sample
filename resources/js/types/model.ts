export type Post = {
    id: string;
    title: string;
    content?: string;
    tags?: any[];
    metadata?: Record<string, any>;
    status: PostStatus;
    user_id: number;
    created_at?: string;
    updated_at?: string;
    user?: User;
};
export type User = {
    id: number;
    name: string;
    email: string;
    email_verified_at?: string;
    created_at?: string;
    updated_at?: string;
    posts?: Post[];
    latest_post?: Post;
    latest_published_post?: Post;
};
export enum PostStatus {
    Draft = "draft",
    Published = "published",
    Unpublished = "unpublished"
}
