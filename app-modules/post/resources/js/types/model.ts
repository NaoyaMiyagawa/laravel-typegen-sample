export type Comment = {
    id: string;
    post_id: string;
    user_id: number;
    content?: string;
    status: string;
    created_at?: string;
    updated_at?: string;
    post?: Post;
};
export type Post = {
    id: string;
    title: string;
    content?: string;
    tags?: any[];
    metadata?: Record<string, any>;
    status: string;
    user_id: number;
    created_at?: string;
    updated_at?: string;
    comments?: Comment[];
};
